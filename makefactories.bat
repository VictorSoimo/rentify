@echo off


set MODELS=User Property Unit Tenant RentCollection Expense ServiceRequest

for %%M in (%MODELS%) do (
  php artisan make:factory %%MFactory --model=%%M
)

pause
