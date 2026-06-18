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

## Items

GET /items

GET /items?category_id={id}

POST /items

GET /items/{id}

PUT /items/{id}

DELETE /items/{id}

### Filter Item Berdasarkan Kategori

Method: GET

URL:

http://localhost:8000/api/v1/items?category_id=1

Header:

Authorization: Bearer {token}

Response:

```json
{
    "success": true,
    "message": "Data item berhasil diambil",
    "data": [
        {
            "id": 1,
            "name": "Laptop",
            "category_id": 1
        }
    ]
}
```