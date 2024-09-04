# Avvio
1. **Avviare l'ambiente di sviluppo**: Nella root del progetto, esegui:
    - Linux: `MY_UID=$(id -u) MY_GID=$(id -g) docker compose up`
2. **Accedere ai servizi**:
    - Il backend PHP sarà disponibile su http://localhost:8080.
    - il frontend React sarà disponibile su http://localhost:3000.
    - Il database mariaDB sarà accessibile su localhost:3306.

# Backend
PHP 8.2 con il seguente **composer.json**:
``` JSON
{
    "require": {
        "slim/slim": "^4.14.0",
        "slim/psr7": "^1.7.0",
        "mustache/mustache": "^2.14.0"
    }
}
```

# Frontend
NODE.JS con React e Bootstrap

# Database
### Import del database
Puoi popolare il database sin dalla build con docker inserendo CREATE TABLEs e INSERTs nel file **docker/init.sql**.
(Non è necessario CREATE DATABASE).

### Impostazioni
Puoi scegliere la password dell'**utente root** ed il nome del db creato con **init.sql** dal **docker-compose.yaml**
``` Dockerfile
environment:
      - MARIADB_ROOT_PASSWORD=password_root
      - MARIADB_DATABASE=nome_database
```
