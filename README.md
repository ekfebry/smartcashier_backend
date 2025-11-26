# Smart Cashier API

Backend Laravel untuk aplikasi kasir pintar dengan fitur lengkap termasuk autentikasi, manajemen produk, transaksi penjualan, dan rekomendasi produk berbasis AI.

## Fitur Utama

- Autentikasi API menggunakan Laravel Sanctum
- Master data: Kategori, Produk, Supplier, Member
- Transaksi penjualan dengan detail item
- Dashboard admin dengan statistik
- Sistem rekomendasi produk hybrid (rule-based + optional AI)
- Endpoint untuk histori pembelian user

## Setup

### Prerequisites

- PHP 8.2+
- Composer
- SQLite atau database lainnya

### Instalasi

1. Clone repository:
   ```bash
   git clone <repository-url>
   cd smart_cashier
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Setup database (default SQLite):
   ```bash
   touch database/database.sqlite
   ```

6. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

7. (Optional) Setup AI API Key untuk rekomendasi:
   Tambahkan ke `.env`:
   ```
   AI_API_KEY=your_openai_api_key
   ```

### Menjalankan Server

```bash
php artisan serve
```

API akan berjalan di `http://localhost:8000`

### Web Interface untuk Testing

Aplikasi juga menyediakan interface web sederhana untuk testing API:

- **Login**: `http://localhost:8000/login`
- **Dashboard**: `http://localhost:8000/dashboard` (setelah login)

Gunakan kredensial dari seeder:
- Email: `john@example.com`, Password: `password`
- Email: `jane@example.com`, Password: `password`

## API Documentation

### Authentication

#### Register
```http
POST /api/auth/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "phone": "08123456789",
  "address": "Jakarta"
}
```

Response:
```json
{
  "member": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "08123456789",
    "address": "Jakarta"
  },
  "token": "1|abc123..."
}
```

#### Login
```http
POST /api/auth/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password"
}
```

Response: Same as register.

### Products

#### List Products
```http
GET /api/products?category_id=1&search=nasi&page=1
Authorization: Bearer {token}
```

Response:
```json
{
  "data": [
    {
      "id": 1,
      "name": "Nasi Goreng",
      "price": 15000,
      "stock": 50,
      "category": {
        "id": 1,
        "name": "Food"
      },
      "supplier": {
        "id": 1,
        "name": "Local Farm"
      }
    }
  ],
  "links": {...},
  "meta": {...}
}
```

#### Get Product Detail
```http
GET /api/products/1
Authorization: Bearer {token}
```

### Dashboard Stats

```http
GET /api/dashboard-stats
Authorization: Bearer {token}
```

Response:
```json
{
  "total_categories": 3,
  "total_products": 6,
  "sales_today": 2,
  "revenue_today": 55000
}
```

### Sales

#### Create Sale
```http
POST /api/sales
Authorization: Bearer {token}
Content-Type: application/json

{
  "member_id": 1,
  "items": [
    {
      "product_id": 1,
      "quantity": 2
    },
    {
      "product_id": 3,
      "quantity": 1
    }
  ]
}
```

Response:
```json
{
  "id": 4,
  "member_id": 1,
  "total_amount": 45000,
  "sale_date": "2025-11-26T04:24:41.000000Z",
  "sale_items": [
    {
      "product_id": 1,
      "quantity": 2,
      "price": 15000
    }
  ]
}
```

#### Get Sale Detail
```http
GET /api/sales/1
Authorization: Bearer {token}
```

### User History

```http
GET /api/user/history
Authorization: Bearer {token}
```

Response: Paginated list of user's sales.

### Recommendations

```http
GET /api/recommendations?user_id=1&context=checkout
Authorization: Bearer {token}
```

Response:
```json
[
  {
    "id": 2,
    "name": "Ayam Bakar",
    "price": 20000,
    "score": 85,
    "reason": "Based on popularity and category"
  }
]
```

### Admin

#### Reindex Stats
```http
POST /api/admin/reindex
```

Response:
```json
{
  "message": "Reindexing completed"
}
```

## Environment Variables

- `SANCTUM_STATEFUL_DOMAINS`: Domain untuk Sanctum (default localhost)
- `AI_API_KEY`: **Optional** - API key untuk integrasi AI recommendation reranking

### AI Integration (Optional)

`AI_API_KEY` digunakan untuk meningkatkan sistem rekomendasi produk dengan integrasi AI eksternal seperti:

- **OpenAI API**: Untuk reranking rekomendasi berdasarkan analisis AI
- **Google AI/Gemini**: Alternatif AI service
- **Hugging Face**: Model AI open-source

**Cara mendapatkan API Key:**
1. **OpenAI**: Daftar di [platform.openai.com](https://platform.openai.com), buat API key di API Keys section
2. **Google AI**: Daftar di [makersuite.google.com](https://makersuite.google.com), dapatkan API key
3. **Lainnya**: Ikuti dokumentasi provider AI yang dipilih

**Tanpa AI_API_KEY:**
Sistem rekomendasi tetap berfungsi dengan algoritma rule-based (popularity, category similarity, frequently bought together).

**Dengan AI_API_KEY:**
Rekomendasi akan direranking menggunakan AI untuk hasil yang lebih akurat dan personalized.

## Testing

Run tests:
```bash
php artisan test
```

## License

MIT License
