# Hospital Management System - Authentication Guide

## How the Authentication System Works

### Security Features Implemented:

1. **Role-Based Access Control**: Each user can only access their own dashboard
2. **Automatic Redirects**: Users are automatically redirected to their appropriate dashboard after login
3. **Session Protection**: Unauthorized access attempts redirect users back to their own dashboard
4. **Secure Logout**: Sessions are properly cleared on logout

### User Roles:

-   **Admin**: Can only access `/admin` dashboard
-   **Doctor**: Can only access `/doctor` dashboard
-   **Patient**: Can only access `/patient` dashboard
-   **Staff**: Can only access `/staff` dashboard

### How It Works:

#### For Users NOT Logged In:

-   Accessing any dashboard (`/admin`, `/doctor`, `/patient`, `/staff`) redirects to login page
-   Users must login with correct credentials

#### For Logged In Users:

-   **Patient** trying to access `/admin`, `/doctor`, or `/staff` → Redirected to `/patient` with error message
-   **Doctor** trying to access `/admin`, `/patient`, or `/staff` → Redirected to `/doctor` with error message
-   **Admin** trying to access `/doctor`, `/patient`, or `/staff` → Redirected to `/admin` with error message
-   **Staff** trying to access `/admin`, `/doctor`, or `/patient` → Redirected to `/staff` with error message

#### After Login:

-   System automatically redirects user to their appropriate dashboard based on their role
-   No manual navigation needed

### Example Scenarios:

1. **Patient Login**:

    - Patient logs in → Automatically goes to `/patient` dashboard
    - If patient types `/admin` in browser → Redirected back to `/patient` with "Access Denied" message

2. **Doctor Login**:

    - Doctor logs in → Automatically goes to `/doctor` dashboard
    - If doctor types `/patient` in browser → Redirected back to `/doctor` with "Access Denied" message

3. **Unauthorized Access**:
    - Any attempt to access wrong dashboard shows error message and redirects to correct dashboard

### Testing the System:

1. Create test users with different roles in your database
2. Login as a patient and try to access `/admin` - you should be redirected back to `/patient`
3. Login as a doctor and try to access `/patient` - you should be redirected back to `/doctor`
4. The system will always keep users in their appropriate dashboard

This ensures complete security - no user can view other users' dashboards even if they know the URLs!
