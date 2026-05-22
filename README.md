# Pokemon API
Simple Laravel API application for managing banned Pokemons and fetching Pokemon information from PokeAPI.

## Instalation 
1. Clone repository
```bash
git clone https://github.com/RafalBytniewski/pokemon-info.git
```
2. Instal Composer
```bash
Composer install
```
3. Create `.env` file
```bash
cp .env.example .env
```
3. Add to .env file
```bash
SUPER_SECRET_KEY="YOUR SECRET KEY"
```
4. Generate Laravel key
```bash
php artisan key:generate
```
5. Run migration
```bash
php artisan migrate
```
6. Start serve
```bash
php artisan serve
```

## API Endpoints

### GET /banned

Returns list of banned pokemons.

**Headers**

```http
X-SUPER-SECRET-KEY: your-secret-key
```

**Response**

```json
[
    {
        "id": 1,
        "name": "pikachu"
    }
]
```

---

### POST /banned

Adds pokemon to banned list.

**Headers**

```http
X-SUPER-SECRET-KEY: your-secret-key
```

**Request**

```json
{
    "name": "pikachu"
}
```

---

### DELETE /banned/{name}

Removes pokemon from banned list.

Example:

```http
DELETE /banned/pikachu
```

**Headers**

```http
X-SUPER-SECRET-KEY: your-secret-key
```

---

### POST /info

Returns information about selected pokemons from PokeAPI.

Banned pokemons are skipped.

**Request**

```json
{
    "pokemons": [
        "pikachu",
        "bulbasaur"
    ]
}
```

**Response**

```json
{
    "data": [
        {
            "name": "bulbasaur",
            "height": 7,
            "weight": 69,
            "source": "pokeapi"
        }
    ]
}
```