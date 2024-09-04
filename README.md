# Avvio
1. **Avviare l'ambiente di sviluppo**: Nella root del progetto, esegui:
    - Linux: `MY_UID=$(id -u) MY_GID=$(id -g) docker compose up`
2. **Accedere ai servizi**:
    - Il backend PHP sarà disponibile su http://localhost:8080.
    - il frontend React sarà disponibile su http://localhost:3000.
    - Il database mariaDB sarà accessibile su localhost:3306.

# Database
### Import del database
Puoi popolare il database sin dalla build con docker inserendo l'esport nel file **docker/init.sql**

### Impostazioni
Puoi scegliere la password dell'**utente root** ed il nome del db creato con **init.sql** dal **docker-compose.yaml**
``` Dockerfile
environment:
      - MARIADB_ROOT_PASSWORD=password_root
      - MARIADB_DATABASE=nome_database
```