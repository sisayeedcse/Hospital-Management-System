let currentPage = window.currentDoctorPage || 'dashboard';

function confirmLogout() {
    window.location.href = '/login';
}

function cancelLogout() {
    document.getElementById('logoutModal').style.display = 'none';
    if (currentPage === 'logout') {
        var lastPage = sessionStorage.getItem('lastDoctorPage') || 'dashboard';
        window.location.href = '?page=' + lastPage;
    }
}

function showNotification(message = 'Saved Successfully') {
    const notification = document.getElementById('saveNotification');
    const messageSpan = notification.querySelector('span');
    messageSpan.textContent = message;
    notification.classList.add('show');
    setTimeout(() => notification.classList.remove('show'), 3000);
}


// Report functions
function showReport(reportType) {
    const reportContent = document.getElementById('report-content');
    const reportTitle = document.getElementById('report-title');
    
    let title = '';
    let data = [];
    
    switch(reportType) {
        case 'appointments':
            title = 'Total Appointments';
            data = getRequestedAppointments();
            break;
        case 'patients':
            title = 'Total Patients (Completed)';
            data = getCompletedAppointments();
            break;
        case 'surgeries':
            title = 'Total Surgeries';
            data = getSurgeries();
            break;
        case 'ratings':
            title = 'Overall Ratings & Reviews';
            data = getRatings();
            break;
    }
    
    reportTitle.textContent = title;
    displayReportData(data, reportType);
    reportContent.style.display = 'block';
}

function getRequestedAppointments() {
    return [
        { name: 'Umme Hafsa', diagnosis: 'Hypertension', contact: '01700000000', status: 'Requested', date: '2024-01-20' },
        { name: 'Sayeed Ibne', diagnosis: 'Asthma', contact: '01700000000', status: 'Requested', date: '2024-01-19' },
        { name: 'Umme Nadia', diagnosis: 'Fever', contact: '01700000000', status: 'Requested', date: '2024-01-18' },
        { name: 'Sayeed Ibne', diagnosis: 'Typhoid', contact: '01700000000', status: 'Requested', date: '2024-01-17' },
        { name: 'Rahim Ahmed', diagnosis: 'Diabetes', contact: '01711111111', status: 'Requested', date: '2024-01-16' },
        { name: 'Fatima Begum', diagnosis: 'Heart Disease', contact: '01722222222', status: 'Requested', date: '2024-01-15' }
    ];
}

function getCompletedAppointments() {
    return [
        { name: 'Rahim Ahmed', diagnosis: 'Diabetes', contact: '01711111111', completedDate: '2024-01-15' },
        { name: 'Fatima Begum', diagnosis: 'Heart Disease', contact: '01722222222', completedDate: '2024-01-14' },
        { name: 'Karim Uddin', diagnosis: 'Cold & Flu', contact: '01733333333', completedDate: '2024-01-13' }
    ];
}

function getSurgeries() {
    return [
        { patient: 'Rahim Ahmed', surgery: 'Heart Bypass', date: '2024-01-10', duration: '4 hours' },
        { patient: 'Fatima Begum', surgery: 'Knee Replacement', date: '2024-01-08', duration: '3 hours' },
        { patient: 'Karim Uddin', surgery: 'Appendectomy', date: '2024-01-05', duration: '1 hour' }
    ];
}

function getRatings() {
    const ratings = [
        { patient: 'Rahim Ahmed', rating: 5, review: 'Excellent service and care' },
        { patient: 'Fatima Begum', rating: 4, review: 'Very professional and helpful' },
        { patient: 'Karim Uddin', rating: 5, review: 'Outstanding treatment' },
        { patient: 'Umme Hafsa', rating: 4, review: 'Good experience overall' }
    ];
    
    const averageRating = (ratings.reduce((sum, r) => sum + r.rating, 0) / ratings.length).toFixed(1);
    return { ratings, averageRating };
}

function displayReportData(data, reportType) {
    const reportTable = document.getElementById('report-table');
    let html = '';
    
    if (reportType === 'ratings') {
        const { ratings, averageRating } = data;
        html = `
            <div class="mb-3">
                <h5>Average Rating: ${averageRating} ⭐</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${ratings.map(r => `
                            <tr>
                                <td>${r.patient}</td>
                                <td>${'⭐'.repeat(r.rating)}</td>
                                <td>${r.review}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        `;
    } else {
        const headers = Object.keys(data[0] || {});
        html = `
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            ${headers.map(h => `<th>${h.charAt(0).toUpperCase() + h.slice(1)}</th>`).join('')}
                        </tr>
                    </thead>
                    <tbody>
                        ${data.map(row => `
                            <tr>
                                ${headers.map(h => `<td>${row[h]}</td>`).join('')}
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        `;
    }
    
    reportTable.innerHTML = html;
}

// Profile image functions
function showNotification(message, type = 'success') {
    const color = type === 'error' ? 'red' : 'green';
    alert(message); // simple alert, you can style later
}

function handleProfileImageUpload() {
    const input = document.getElementById('profileImageInput');
    const image = document.getElementById('profileImage');
    const uploadBtn = document.getElementById('profileImageUploadBtn');
    const defaultSrc = image.src; // store default image

    // click on image opens file chooser
    image.onclick = () => input.click();

    // Upload button
    uploadBtn.onclick = () => {
        if (!input.files.length) {
            showNotification('No photo selected. Please select a photo first.', 'error');
            return;
        }
        const reader = new FileReader();
        reader.onload = e => {
            image.src = e.target.result;
            showNotification('Photo uploaded successfully');
        };
        reader.readAsDataURL(input.files[0]);
    };

    // Remove button
    window.removeProfileImage = () => {
        if (image.src === defaultSrc) {
            showNotification('No photo to remove.', 'error');
        } else {
            image.src = defaultSrc;
            input.value = ""; // clear previous file
            showNotification('Photo removed successfully');
        }
    };
}


// Form validation functions
function validateName(name) {
    return /^[a-zA-Z\s]{5,30}$/.test(name);
}

function validateSpecialization(specialization) {
    return /^[a-zA-Z\s]{8,100}$/.test(specialization);
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validateAddress(address) {
    return address.length >= 10 && address.length <= 100;
}

function validateMobile(mobile) {
    return /^\+880[0-9]{10}$/.test(mobile);
}

function validateHealthTips(description) {
    const wordCount = str_word_count(description);
    return wordCount >= 20 && wordCount <= 250;
}

function str_word_count(str) {
    return str.trim().split(/\s+/).filter(word => word.length > 0).length;
}

function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + 'Error');
    
    field.classList.add('is-invalid');
    errorDiv.textContent = message;
}

function clearFieldError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + 'Error');
    
    field.classList.remove('is-invalid');
    errorDiv.textContent = '';
}

function validateSettingsForm() {
    let isValid = true;
    const errors = [];
    
    const name = document.getElementById('name').value;
    const specialization = document.getElementById('specialization').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const mobile = document.getElementById('mobile').value;
    
    // Clear previous errors
    ['name', 'specialization', 'email', 'address', 'mobile'].forEach(clearFieldError);
    
    if (!validateName(name)) {
        showFieldError('name', 'Name must be 5-30 alphabets only');
        errors.push('Name must be 5-30 alphabets only');
        isValid = false;
    }
    
    if (!validateSpecialization(specialization)) {
        showFieldError('specialization', 'Specialization must be 8-100 alphabets');
        errors.push('Specialization must be 8-100 alphabets');
        isValid = false;
    }
    
    if (!validateEmail(email)) {
        showFieldError('email', 'Please enter a valid email address');
        errors.push('Please enter a valid email address');
        isValid = false;
    }
    
    if (!validateAddress(address)) {
        showFieldError('address', 'Address must be 10-100 characters');
        errors.push('Address must be 10-100 characters');
        isValid = false;
    }
    
    if (!validateMobile(mobile)) {
        showFieldError('mobile', 'Mobile must be 13 digits starting with +880');
        errors.push('Mobile must be 13 digits starting with +880');
        isValid = false;
    }
    
    if (!isValid) {
        const errorMessage = errors.length === 1 ? errors[0] : 'Please enter valid information';
        showNotification(errorMessage, 'error');
    }
    
    return isValid;
}

function validateHealthTipsForm() {
    const description = document.getElementById('description').value;
    const wordCount = str_word_count(description);
    
    clearFieldError('description');
    
    if (description.trim() === '') {
        showFieldError('description', 'Health tips description is required');
        showNotification('Health tips description is required', 'error');
        return false;
    }
    
    if (wordCount < 20) {
        showFieldError('description', 'Health tips must be at least 20 words');
        showNotification('Health tips must be at least 20 words', 'error');
        return false;
    }
    
    if (wordCount > 250) {
        showFieldError('description', 'Health tips must not exceed 250 words');
        showNotification('Health tips must not exceed 250 words', 'error');
        return false;
    }
    
    return true;
}

function updateWordCount() {
    const description = document.getElementById('description');
    const wordCount = document.getElementById('wordCount');
    
    if (description && wordCount) {
        const count = str_word_count(description.value);
        wordCount.textContent = count;
        
        if (count < 20) {
            wordCount.style.color = '#dc3545';
        } else if (count > 250) {
            wordCount.style.color = '#dc3545';
        } else {
            wordCount.style.color = '#28a745';
        }
    }
}

function resetForm() {
    document.getElementById('settingsForm').reset();
    ['name', 'specialization', 'email', 'address', 'mobile'].forEach(clearFieldError);
}

function resetHealthTipsForm() {
    document.getElementById('addtipsForm').reset();
    clearFieldError('description');
    updateWordCount();
}

function showNotification(message = 'Saved Successfully', type = 'success') {
    const notification = document.getElementById('saveNotification');
    const messageSpan = notification.querySelector('span');
    const icon = notification.querySelector('i');
    
    messageSpan.textContent = message;
    
    if (type === 'error') {
        notification.style.background = '#dc3545';
        icon.className = 'fas fa-exclamation-circle';
    } else {
        notification.style.background = '#10b981';
        icon.className = 'fas fa-check-circle';
    }
    
    notification.classList.add('show');
    setTimeout(() => notification.classList.remove('show'), 3000);
}

// Time Schedule Functions
let schedules = [
    { id: 1, date: '15/09/2025', startTime: '06:00 PM', endTime: '10:00 PM', slot: '15 minutes' },
    { id: 2, date: '16/09/2025', startTime: '07:00 PM', endTime: '09:00 PM', slot: '10 minutes' },
    { id: 3, date: '17/09/2025', startTime: '04:00 PM', endTime: '08:00 PM', slot: '20 minutes' }
];

let editingScheduleId = null;

function saveSchedule() {
    const date = document.getElementById('scheduleDate').value;
    const slotDuration = document.getElementById('slotDuration').value;
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;
    
    // Clear previous errors
    clearScheduleErrors();
    
    // Validation
    if (!date) {
        showScheduleError('scheduleDate', 'Please select a date');
        return;
    }
    
    if (!slotDuration) {
        showScheduleError('slotDuration', 'Please select slot duration');
        return;
    }
    
    if (!startTime) {
        showScheduleError('startTime', 'Please select start time');
        return;
    }
    
    if (!endTime) {
        showScheduleError('endTime', 'Please select end time');
        return;
    }
    
    // Check if start time is before end time
    if (startTime >= endTime) {
        showScheduleError('endTime', 'End time must be after start time');
        return;
    }
    
    // Format date for display
    const formattedDate = formatDateForDisplay(date);
    const slotText = slotDuration + ' minutes';
    
    if (editingScheduleId) {
        // Update existing schedule
        const scheduleIndex = schedules.findIndex(s => s.id === editingScheduleId);
        if (scheduleIndex !== -1) {
            schedules[scheduleIndex] = {
                id: editingScheduleId,
                date: formattedDate,
                startTime: startTime,
                endTime: endTime,
                slot: slotText
            };
            showNotification('Schedule updated successfully');
        }
        editingScheduleId = null;
    } else {
        // Add new schedule
        const newId = Math.max(...schedules.map(s => s.id), 0) + 1;
        schedules.push({
            id: newId,
            date: formattedDate,
            startTime: startTime,
            endTime: endTime,
            slot: slotText
        });
        showNotification('Schedule saved successfully');
    }
    
    // Clear form
    clearScheduleForm();
    
    // Refresh table
    renderScheduleTable();
}

function editSchedule(button) {
    const row = button.closest('tr');
    const cells = row.querySelectorAll('td');
    
    const date = cells[0].textContent;
    const startTime = cells[1].textContent;
    const endTime = cells[2].textContent;
    const slot = cells[3].textContent;
    
    // Find the schedule ID
    const scheduleId = parseInt(row.getAttribute('data-schedule-id'));
    editingScheduleId = scheduleId;
    
    // Populate form with existing data
    document.getElementById('scheduleDate').value = formatDateForInput(date);
    document.getElementById('slotDuration').value = slot.replace(' minutes', '');
    document.getElementById('startTime').value = startTime;
    document.getElementById('endTime').value = endTime;
    
    // Scroll to form
    document.querySelector('.schedule-input-section').scrollIntoView({ behavior: 'smooth' });
}

function deleteSchedule(button) {
    const row = button.closest('tr');
    const scheduleId = parseInt(row.getAttribute('data-schedule-id'));
    const schedule = schedules.find(s => s.id === scheduleId);
    
    if (confirm(`Are you sure you want to delete the schedule for ${schedule.date}?`)) {
        schedules = schedules.filter(s => s.id !== scheduleId);
        renderScheduleTable();
        showNotification('Schedule deleted successfully');
    }
}

function renderScheduleTable() {
    const tbody = document.getElementById('scheduleTableBody');
    
    if (schedules.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-4">
                    <div class="schedule-empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h6>No schedules found</h6>
                        <p>Add your first schedule using the form above</p>
                    </div>
                </td>
            </tr>
        `;
        return;
    }
    
    tbody.innerHTML = schedules.map(schedule => `
        <tr data-schedule-id="${schedule.id}">
            <td>${schedule.date}</td>
            <td class="time-display">${schedule.startTime}</td>
            <td class="time-display">${schedule.endTime}</td>
            <td>${schedule.slot}</td>
            <td>
                <button class="btn btn-primary btn-sm me-2" onclick="editSchedule(this)">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteSchedule(this)">Delete</button>
            </td>
        </tr>
    `).join('');
}

function clearScheduleForm() {
    document.getElementById('scheduleDate').value = '';
    document.getElementById('slotDuration').value = '';
    document.getElementById('startTime').value = '';
    document.getElementById('endTime').value = '';
    editingScheduleId = null;
    clearScheduleErrors();
}

function clearScheduleErrors() {
    ['scheduleDate', 'slotDuration', 'startTime', 'endTime'].forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const errorDiv = document.getElementById(fieldId + 'Error');
        
        if (field) field.classList.remove('is-invalid');
        if (errorDiv) errorDiv.textContent = '';
    });
}

function showScheduleError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + 'Error');
    
    if (field) field.classList.add('is-invalid');
    if (errorDiv) errorDiv.textContent = message;
}

function formatDateForDisplay(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}

function formatDateForInput(dateString) {
    const [day, month, year] = dateString.split('/');
    return `${year}-${month}-${day}`;
}

// Initialize time schedule page
function initializeTimeSchedule() {
    renderScheduleTable();
    
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('scheduleDate');
    if (dateInput) {
        dateInput.min = today;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if (currentPage !== 'logout') {
        sessionStorage.setItem('lastDoctorPage', currentPage);
    }
    
    if (currentPage === 'appointment') {
        // Empty appointment section - no functionality needed
    }
    
    if (currentPage === 'report') {
        document.querySelectorAll('.report-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const reportType = this.getAttribute('data-report');
                showReport(reportType);
            });
        });
    }
    
    if (currentPage === 'timeschedule') {
        initializeTimeSchedule();
    }
    
    if (currentPage === 'settings') {
        handleProfileImageUpload();
        
        const settingsForm = document.getElementById('settingsForm');
        if (settingsForm) {
            settingsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (validateSettingsForm()) {
                    showNotification('Profile updated successfully');
                }
            });
        }
    }
    
    if (currentPage === 'addtips') {
        const description = document.getElementById('description');
        if (description) {
            description.addEventListener('input', updateWordCount);
            updateWordCount();
        }
        
        const addtipsForm = document.getElementById('addtipsForm');
        if (addtipsForm) {
            addtipsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (validateHealthTipsForm()) {
                    showNotification('Health tips saved successfully');
                }
            });
        }
    }
    
    if (currentPage === 'logout') {
        document.getElementById('logoutModal').style.display = 'flex';
    }
});
