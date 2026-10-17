# Vehicle Management API

**Course:** CIT3102  
**Project:** Build Your Own API  
**Repository:** [Link to your repository]

## Project Members

- **Name:** [Janna Icmat]
- **Partner:** [Mark Bowen Suarez]
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

### 1. User Registration

* **Method:** `POST`
* **Endpoint:** `/api/register`
* **Status:** `201 Created`

### 2. User Login

* **Method:** `POST`
* **Endpoint:** `/api/login`
* **Status:** `200 OK`

### 3. Unauthorized Request

* **Method:** `GET`
* **Endpoint:** `/api/vehicles`
* **Status:** `401 Unauthorized`

### 4. Retrieve All Vehicles

* **Method:** `GET`
* **Endpoint:** `/api/vehicles`
* **Status:** `200 OK`

### 5. Create a Vehicle Record

* **Method:** `POST`
* **Endpoint:** `/api/vehicles`
* **Status:** `201 Created`

### 6. Validation Error

* **Method:** `POST`
* **Endpoint:** `/api/vehicles`
* **Status:** `422 Unprocessable Content`

### 7. Retrieve Single Vehicle

* **Method:** `GET`
* **Endpoint:** `/api/vehicles/{id}`
* **Status:** `200 OK`

### 8. Nonexistent Resource Request

* **Method:** `GET`
* **Endpoint:** `/api/vehicles/{id}`
* **Status:** `404 Not Found`

### 9. Update a Vehicle Record

* **Method:** `PUT`
* **Endpoint:** `/api/vehicles/{id}`
* **Status:** `200 OK`

### 10. Delete a Vehicle Record

* **Method:** `DELETE`
* **Endpoint:** `/api/vehicles/{id}`
* **Status:** `204 No Content`

## Conceptual Analysis

### Why Does DELETE Return 204 Instead of 200?

The HTTP `204 No Content` status code is the RESTful standard for a successful `DELETE` action because the target resource has been permanently removed from the server. Since the resource no longer exists, there is no entity body or data left to return to the client. While a `200 OK` status can be used if the server returns a confirmation message body, returning `204 No Content` clearly indicates that the action was performed successfully without transmitting unnecessary response payload back over the network.

```

```
