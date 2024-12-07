# Mini TPM Project
## About
Creating CRUD application for one of the biggest Consulting Firm in Indonesia. The application will have functionality to add or list Consultants, and each Consultant will be assigned to Client's project depends on Consultant's industry and expertise. 

ERD : https://app.eraser.io/workspace/bYlibWMmkdNtRMHX7cnt

## Changes
1. Database change (different from last mini project)
2. Improving user interface using bootstrap & css
3. Create login register auth and middleware

## How to run

1. Clone this repository using Terminal
```
gh repo clone bronzedior/TPM_BE_MiniProject3_FransiscusBronzedior_B
```

2. Start XAMPP (Apache and MYSql)

3. Fresh Migrate
```
php artisan migrate:fresh --seed
```

4. Serve
```
php artisan serve
```
