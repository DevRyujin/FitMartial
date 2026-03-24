document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-calendar]").forEach(initCalendar);
});

const trainingData = {};

function initCalendar(calendarEl) {
    const grid = calendarEl.querySelector("[data-calendar-grid]");
    const label = calendarEl.querySelector("[data-calendar-month-year]");
    const prevBtn = calendarEl.querySelector("[data-calendar-prev]");
    const nextBtn = calendarEl.querySelector("[data-calendar-next]");
    const pickerBtn = calendarEl.querySelector("[data-calendar-picker]");
    const pickerPanel = calendarEl.querySelector(
        "[data-calendar-picker-panel]",
    );
    const pickerYearLabel = calendarEl.querySelector("[data-picker-year]");
    const monthButtons = calendarEl.querySelectorAll("[data-month]");
    const yearPrev = calendarEl.querySelector("[data-year-prev]");
    const yearNext = calendarEl.querySelector("[data-year-next]");

    let currentDate = new Date();
    let pickerYear = currentDate.getFullYear();

    const overlay = calendarEl.querySelector("[data-training-overlay]");
    const closeBtn = overlay.querySelector("[data-training-close]");
    const form = overlay.querySelector("[data-training-form]");

    const entryColors = [
        "bg-blue-600 py-1",
        "bg-green-600 py-1",
        "bg-purple-600 py-1",
        "bg-pink-600 py-1",
        "bg-red-600 py-1",
        "bg-yellow-500 py-1",
        "bg-indigo-600 py-1",
    ];

    if (!overlay || !form) return;

    let activeDateKey = null;

    // 🔥 FIXED DATE (NO UTC BUG)
    function formatLocalDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const day = String(date.getDate()).padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    function openTrainingOverlay(year, month, day) {
        const date = new Date(year, month, day);

        // ✅ FIXED
        activeDateKey = formatLocalDate(date);

        overlay.classList.remove("hidden");
        form.reset();
    }

    function closeTrainingOverlay() {
        overlay.classList.add("hidden");
        activeDateKey = null;
    }

    function renderCalendar() {
        grid.innerHTML = "";

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        label.textContent = currentDate.toLocaleDateString("en-US", {
            month: "long",
            year: "numeric",
        });

        const firstDay = new Date(year, month, 1).getDay();
        const totalDays = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            grid.appendChild(document.createElement("div"));
        }

        for (let day = 1; day <= totalDays; day++) {
            const btn = document.createElement("button");
            btn.type = "button";

            btn.className =
                "relative h-16 rounded-md flex items-center justify-center " +
                "bg-gray-900 hover:bg-gray-700 transition " +
                "focus:outline-none focus:ring focus:ring-blue-500";

            btn.textContent = day;

            const dateKey = formatLocalDate(new Date(year, month, day));

            // indicators
            if (trainingData[dateKey]?.length) {
                const barWrap = document.createElement("div");

                barWrap.className =
                    "absolute bottom-1 left-1 right-1 grid grid-cols-5 gap-1 max-h-6 overflow-hidden";

                trainingData[dateKey].forEach((entry) => {
                    const bar = document.createElement("span");
                    bar.className = `w-full h-2 rounded ${entry.color}`;
                    barWrap.appendChild(bar);
                });

                btn.appendChild(barWrap);
            }

            if (isToday(year, month, day)) {
                btn.classList.add("ring-2", "ring-blue-400");
            }

            btn.addEventListener("click", () => {
                selectDay(btn);
                openTrainingOverlay(year, month, day);
            });

            grid.appendChild(btn);
        }
    }

    function selectDay(btn) {
        grid.querySelectorAll("[data-selected]").forEach((b) => {
            b.removeAttribute("data-selected");
            b.classList.remove("bg-blue-600");
        });

        btn.dataset.selected = "true";
        btn.classList.add("bg-blue-600");
    }

    function isToday(y, m, d) {
        const t = new Date();
        return y === t.getFullYear() && m === t.getMonth() && d === t.getDate();
    }

    prevBtn.onclick = () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    };

    nextBtn.onclick = () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    };

    pickerBtn.onclick = () => {
        pickerYear = currentDate.getFullYear();
        pickerYearLabel.textContent = pickerYear;
        pickerPanel.classList.toggle("hidden");
    };

    monthButtons.forEach((btn) => {
        btn.onclick = () => {
            currentDate.setFullYear(pickerYear);
            currentDate.setMonth(Number(btn.dataset.month));
            pickerPanel.classList.add("hidden");
            renderCalendar();
        };
    });

    yearPrev.onclick = () => {
        pickerYear--;
        pickerYearLabel.textContent = pickerYear;
    };

    yearNext.onclick = () => {
        pickerYear++;
        pickerYearLabel.textContent = pickerYear;
    };

    renderCalendar();

    closeBtn.addEventListener("click", closeTrainingOverlay);

    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) {
            closeTrainingOverlay();
        }
    });

    function getRandomColor() {
        const i = Math.floor(Math.random() * entryColors.length);
        return entryColors[i];
    }

    // 🔥 SUBMIT (FIXED)
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (!activeDateKey) return;

        const formData = new FormData(form);

        formData.append("training_date", activeDateKey);
        formData.append("color", getRandomColor());

        try {
            const res = await fetch("/training", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                },
                credentials: "same-origin",
            });

            const data = await res.json();
            if (!data.success) throw new Error();

            // ✅ USE BACKEND ENTRY (NO DUPLICATES)
            trainingData[activeDateKey] ??= [];
            trainingData[activeDateKey].unshift(data.entry);

            closeTrainingOverlay();
            renderCalendar();

            // optional live update hook
            if (window.updateTrainingEntries) {
                window.updateTrainingEntries(data.entry);
            }
        } catch (err) {
            alert("Failed to save training entry.");
            console.error(err);
        }
    });
}
