# Vehicle Management API

**Course:** CIT3102  
**Project:** Build Your Own API  
**Repository:** [https://github.com/Mxorphieus/cit3102-m5-vehicles.git]

## Project Members

- **Name:** Janna Icmat
- **Partner:** Mark Bowen Suarez
- **Section:** IT3E
- **Resource:** Vehicle

## Project Description

The Vehicle Management API is a RESTful API developed using Laravel. It allows users to register, log in, and perform full CRUD (Create, Read, Update, Delete) operations on vehicle records. Laravel Sanctum is implemented to protect endpoints through token-based authentication.

## Resource: Vehicle

Each vehicle record contains the following fields:

| Field | Type | Description |
|---|---|---|
| `id` | Integer | Unique identifier of the vehicle |
| `brand` | String | Manufacturer or make of the vehicle (e.g., Toyota) |
| `model` | String | Model name of the vehicle (e.g., Corolla) |
| `year` | Integer | Manufacturing year |
| `price` | Numeric | Price of the vehicle |
| `created_at` | Timestamp | Date and time the record was created |
| `updated_at` | Timestamp | Date and time the record was last updated |

## Setup Instructions

### Prerequisites

Ensure you have the following installed on your machine:
- PHP (>= 8.1)
- Composer
- Git

### Installation & Execution

1. **Clone the repository:**
   ```bash
   git clone <your-repository-url>
   cd vehicle-api

```

2. **Install dependencies:**
```bash
composer install

```


3. **Configure environment:**
```bash
cp .env.example .env

```


4. **Generate application key:**
```bash
php artisan key:generate

```


5. **Set up the SQLite database:**
Ensure `database/database.sqlite` exists (create it manually if needed), then run migrations:
```bash
php artisan migrate

```


6. **Serve the application:**
```bash
php artisan serve

```


The API will run locally at `http://127.0.0.1:8000`.

## API Routes Table

| Method | Path | Description | Token Required |
| --- | --- | --- | --- |
| POST | `/api/register` | Register a new user and issue an API token | No |
| POST | `/api/login` | Authenticate a user and issue an API token | No |
| POST | `/api/logout` | Revoke the current authentication token | Yes |
| GET | `/api/me` | Retrieve current authenticated user details | Yes |
| GET | `/api/vehicles` | Retrieve a list of all vehicles | Yes |
| POST | `/api/vehicles` | Create a new vehicle record | Yes |
| GET | `/api/vehicles/{id}` | Retrieve details of a specific vehicle | Yes |
| PUT | `/api/vehicles/{id}` | Update an existing vehicle record | Yes |
| DELETE | `/api/vehicles/{id}` | Remove a vehicle record from the system | Yes |

## Screenshots & API Testing

The following section demonstrates all required test cases and their actual HTTP response status codes.

## API Testing in Bruno

The following screenshots show the API requests and their actual responses in Bruno. Each test includes the expected HTTP status code.

### 1. User Registration

- **Method:** `POST`
- **Endpoint:** `/api/register`
- **Expected Output:** `201 Created`

![User registration request and response](screenshot/Register_2.jpg)

### 2. User Login

- **Method:** `POST`
- **Endpoint:** `/api/login`
- **Expected Output:** `200 OK`

![User login request and response](screenshot/Login_2.jpg)

### 3. Unauthorized Request

- **Method:** `GET`
- **Endpoint:** `/api/vehicles`
- **Expected Output:** `401 Unauthorized`

![Request without an access token](screenshot/Vehicle%20(without%20token)_2.jpg)

### 4. Retrieve All Vehicle Products

- **Method:** `GET`
- **Endpoint:** `/api/vehicles`
- **Expected Output:** `200 OK`

![Retrieve all vehicle products](screenshot/Vehicle%20(with%20token)_2.jpg)

### 5. Create a Vehicle Product

- **Method:** `POST`
- **Endpoint:** `/api/vehicles`
- **Expected Output:** `201 Created`

![Create a vehicle product](screenshot/New%20Vehicle_2.jpg)

### 6. Validation Error

- **Method:** `POST`
- **Endpoint:** `/api/vehicles`
- **Expected Output:** `422 Unprocessable Content`

The API should reject invalid input and return validation errors.

![Validation error for missing required fields](screenshot/Vehicle%20Missing%20Field_2.jpg)

### 7. Retrieve One Vehicle Product

- **Method:** `GET`
- **Endpoint:** `/api/vehicles/{vehicle}`
- **Expected Output:** `200 OK`

Replace `{vehicle}` with the ID of an existing vehicle record.

![Retrieve a single vehicle product](screenshot/Single%20Vehicle%20ID_2.jpg)

### 8. Nonexistent Vehicle Product

- **Method:** `GET`
- **Endpoint:** `/api/vehicles/99999`
- **Expected Output:** `404 Not Found`

The API should return a not-found response when the requested vehicle ID does not exist.

![Request for a nonexistent vehicle product](screenshot/Non%20Existant%20Vehicle_2.jpg)

### 9. Update a Vehicle Product

- **Method:** `PUT`
- **Endpoint:** `/api/vehicles/{vehicle}`
- **Expected Output:** `200 OK`

Replace `{vehicle}` with the ID of an existing vehicle record.

![Update a vehicle product](screenshot/Update%20Vehicle_2.jpg)

### 10. Delete a Vehicle Product

- **Method:** `DELETE`
- **Endpoint:** `/api/vehicles/{vehicle}`
- **Expected Output:** `204 No Content`

A successful deletion returns no response body.

![Delete a vehicle product](screenshot/Delete%20Vehicle_2.jpg)

## Conceptual Analysis

### Why Does DELETE Return 204 Instead of 200?

The HTTP `204 No Content` status code is the RESTful standard for a successful `DELETE` action because the target resource has been permanently removed from the server. Since the resource no longer exists, there is no entity body or data left to return to the client. While a `200 OK` status can be used if the server returns a confirmation message body, returning `204 No Content` clearly indicates that the action was performed successfully without transmitting unnecessary response payload back over the network.

```

```
