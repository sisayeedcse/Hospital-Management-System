// Utility Functions
function showNotification(message) {
    const notification = document.querySelector('[data-notification]');
    notification.querySelector('span').textContent = message;
    notification.classList.add('show');
    setTimeout(() => notification.classList.remove('show'), 3000);
}

// DOM Elements
const taskDropdown = document.getElementById('task-dropdown');
const completeBtn = document.getElementById('complete-task-btn');
const taskTableBody = document.getElementById('task-table-body');
const noTasksMsg = document.getElementById('no-tasks-msg');
const shiftDateDropdown = document.getElementById('shift-date-dropdown');
const shiftTypeDropdown = document.getElementById('shift-type-dropdown');
const requestShiftBtn = document.getElementById('request-shift-btn');

// Event Listeners
document.getElementById('settings-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    showNotification('Saved Successfully');
});

document.getElementById('complete-task-btn')?.addEventListener('click', function() {
    const val = taskDropdown.value;
    if (!val) return;
    
    const row = taskTableBody.querySelector(`tr[data-taskid="${val}"]`);
    if (row) row.remove();
    taskDropdown.querySelector(`option[value="${val}"]`)?.remove();
    taskDropdown.value = '';
    completeBtn.disabled = true;
    
    if (taskTableBody.children.length === 0) {
        noTasksMsg.style.display = 'block';
        taskDropdown.style.display = 'none';
        completeBtn.style.display = 'none';
    }
    
    showNotification('Task Completed');
});

document.getElementById('request-shift-btn')?.addEventListener('click', function() {
    showNotification('Shift Change Request Sent');
    shiftDateDropdown.value = '';
    shiftTypeDropdown.innerHTML = '<option value="">Choose Shift</option>';
    shiftTypeDropdown.disabled = true;
    this.disabled = true;
});

// Navigation
const sectionIds = ['section-dashboard','section-tasks','section-shift','section-settings'];
const navBtns = ['btn-dashboard','btn-tasks','btn-shift','btn-settings', 'btn-logout'];
let lastSection = 'section-dashboard';

navBtns.slice(0, -1).forEach((btnId, idx) => {
    document.getElementById(btnId)?.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('.sidebar-menu .nav-link').forEach(l => l.classList.remove('active', 'active-pill'));
        this.classList.add('active', 'active-pill');
        document.getElementById(lastSection).classList.remove('show');
        setTimeout(() => {
            sectionIds.forEach(sid => document.getElementById(sid).style.display = 'none');
            document.getElementById(sectionIds[idx]).style.display = 'block';
            setTimeout(() => document.getElementById(sectionIds[idx]).classList.add('show'), 10);
            lastSection = sectionIds[idx];
        }, 200);
    });
});

// Logout Handling
const logoutBtn = document.getElementById('btn-logout');
logoutBtn?.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelectorAll('.sidebar-menu .nav-link').forEach(l => l.classList.remove('active', 'active-pill'));
    this.classList.add('active', 'active-pill');
    sectionIds.forEach(sid => {
        document.getElementById(sid).style.display = 'none';
        document.getElementById(sid).classList.remove('show');
    });
    document.getElementById('logout-modal').style.display = 'flex';
});

document.getElementById('cancel-logout')?.addEventListener('click', function() {
    document.getElementById('logout-modal').style.display = 'none';
    document.getElementById(lastSection).style.display = 'block';
    setTimeout(() => document.getElementById(lastSection).classList.add('show'), 10);
});

document.getElementById('confirm-logout')?.addEventListener('click', () => window.location.href = '/login');

// Form Controls
taskDropdown?.addEventListener('change', function() {
    completeBtn.disabled = !this.value;
});

shiftDateDropdown?.addEventListener('change', function() {
    const date = this.value;
    shiftTypeDropdown.innerHTML = '<option value="">Choose Shift</option>';
    shiftTypeDropdown.disabled = true;
    requestShiftBtn.disabled = true;
    if (!date) return;
    
    const found = window.shiftData.find(s => s.date === date);
    if (!found) return;
    
    const assigned = found.shift;
    const available = ['Morning','Day','Night'].filter(s => s !== assigned);
    available.forEach(s => {
        const opt = document.createElement('option');
        opt.value = s;
        opt.text = s;
        shiftTypeDropdown.appendChild(opt);
    });
    shiftTypeDropdown.disabled = false;
});

shiftTypeDropdown?.addEventListener('change', function() {
    requestShiftBtn.disabled = !this.value;
});

// Calendar
(function() {
    const calendarMonthLabel = document.getElementById('calendar-month-label');
    const calendarBody = document.getElementById('calendar-body');
    const monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    const today = new Date();
    let viewMonth = today.getMonth();
    let viewYear = today.getFullYear();
    
    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const prevMonthLastDay = new Date(year, month, 0);
        const daysInMonth = lastDay.getDate();
        const daysInPrevMonth = prevMonthLastDay.getDate();
        const startDay = firstDay.getDay();
        
        let html = '';
        let day = 1;
        let nextMonthDay = 1;
        let prevMonthStart = daysInPrevMonth - startDay + 1;
        
        for (let row = 0; row < 5; row++) {
            html += '<tr>';
            for (let col = 0; col < 7; col++) {
                let [cellDay, cellMonth, cellYear] = [0, month, year];
                let isToday = false;
                
                if (row === 0 && col < startDay) {
                    cellDay = prevMonthStart++;
                    cellMonth = month === 0 ? 11 : month - 1;
                    cellYear = month === 0 ? year - 1 : year;
                } else if (day > daysInMonth) {
                    cellDay = nextMonthDay++;
                    cellMonth = month === 11 ? 0 : month + 1;
                    cellYear = month === 11 ? year + 1 : year;
                } else {
                    cellDay = day++;
                    isToday = cellDay === today.getDate() && cellMonth === today.getMonth() && cellYear === today.getFullYear();
                }
                
                const tdClass = isToday ? 'calendar-active' : '';
                html += `<td class="${tdClass}">${cellDay}${isToday ? '<div class="calendar-dot"></div>' : ''}</td>`;
            }
            html += '</tr>';
            if (day > daysInMonth && nextMonthDay > 7) break;
        }
        
        calendarBody.innerHTML = html;
        calendarMonthLabel.textContent = `${monthNames[month]} ${year}`;
    }
    
    document.getElementById('calendar-up-btn')?.addEventListener('click', function() {
        viewMonth = viewMonth === 0 ? 11 : viewMonth - 1;
        viewYear = viewMonth === 11 ? viewYear - 1 : viewYear;
        renderCalendar(viewMonth, viewYear);
    });
    
    document.getElementById('calendar-down-btn')?.addEventListener('click', function() {
        viewMonth = viewMonth === 11 ? 0 : viewMonth + 1;
        viewYear = viewMonth === 0 ? viewYear + 1 : viewYear;
        renderCalendar(viewMonth, viewYear);
    });
    
    // Initialize calendar
    renderCalendar(viewMonth, viewYear);
})();
