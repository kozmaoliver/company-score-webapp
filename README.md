# Company Score Próba Projekt

Ez a projekt egy próbamunka részeként készült, **PHP 8.1** + **Symfony 6.4** keretrendszer felhasználásával. A környezet Docker segítségével egyszerűen telepíthető és futtatható.

## 🐳 Telepítés Dockerrel

A projekt tartalmaz egy `compose` konfigurációt, amellyel gyorsan beüzemelheted az alkalmazást.

### 1. Teljes környezet indítása:

```bash
docker compose up -d
```

### 2. Csak az adatbázis indítása (ha Symfony CLI-vel szeretnéd futtatni az alkalmazást):

```bash
docker compose up database -d
```

> [!warning]
> Ebben az esetben figyelj arra, hogy a .env fájlban a DATABASE_URL értéke egyezzen az adatbázis konténer adataival.

### ⚙️ Telepítési lépések (konténerben vagy lokálisan)

## bash nyitása konténeren bellűl
```bash
docker exec -it company-score-app bash
```

```bash
# Composer csomagok telepítése
composer install

# Adatbázis migrációk futtatása
php bin/console doctrine:migrations:migrate

# Tesztadatok betöltése (Fixtures)
php bin/console doctrine:fixtures:load --no-interaction

# Töröld és warmupold a cachet
php bin/console cache:clear
```

## Konténeren kívűl (nincs node a docker image-ben)

```bash
# Telepítsd a node modulokat és futtasd az asset buildelést
npm install
npm run build
```

## 🔗 Elérhetőség

Ha minden hiba nélkül fut, az alkalmazás az alábbi címen érhető el:

👉 http://localhost:8000
