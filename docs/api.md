# Inventory API v1

Base URL

http://localhost:8000/api/v1

---

## Register

POST /register

Body

```json
{
    "name":"Fauzaan",
    "email":"fauzaan@gmail.com",
    "password":"password",
    "password_confirmation":"password"
}
```

Response

```json
{
    "success": true,
    "message": "User berhasil didaftarkan"
}
```

---

## Login

POST /login

Body

```json
{
    "email":"fauzaan@gmail.com",
    "password":"password"
}
```

---

## Categories

GET /categories

POST /categories

GET /categories/{id}

PUT /categories/{id}

DELETE /categories/{id}

---

## Items

GET /items

POST /items

GET /items/{id}

PUT /items/{id}

DELETE /items/{id}