## Backend Setup

Before starting the application, create a `.env` file and define the following environment variables.
Some of them can be copied from `.env.example`.

### Application
APP_NAME
APP_ENV
APP_KEY
APP_DEBUG
APP_URL

### Database
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

### Logging
LOG_CHANNEL=stack
LOG_LEVEL=debug

### Broadcast / Cache / Queue / Session
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_DOMAIN=localhost

### Stripe / Payments
STRIPE_KEY=
STRIPE_SECRET=
STRIPE_WEBHOOK_SECRET=
CASHIER_CURRENCY=pln

PAYMENT_SUCCESS=api/payment.success
PAYMENT_CANCELL=api/payment.cancel
FRONTEND_URL

## Running the Backend

```sh
composer install
npm install
php artisan key:generate
php artisan storage:link
php artisan serve
