<div class="flex justify-between items-end mx-auto pb-4 font-bold text-xl text-[#FFF481] gap-36 w-[90%]">
<h1 class="text-2xl"> <span>@yield('title', 'Home')</span></h1>
    <div class="clock text-4xl" id="clock">
        <!-- The clock will be displayed here -->
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById('clock').textContent = timeString;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);

    // Initialize clock immediately
    updateClock();
</script>
