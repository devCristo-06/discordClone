# DISCORD CLONE

Progetto Full-Stack con le seguenti tecnologie:

**Frontend** 
- Angular 21
- Bootstrap
- RxJS
  
**Backend**
- Laravel 12
- PHP 8.x
- MySQL 8

**Infrastrutture**
- Docker e Docker Compose
- WebSocket

# CARATTERISTICHE
- 🔒 Autenticazione sicura (OAuth 2 e JWT)
- ✉️ Messaggi in tempo reale tramite WebSocket
- 👤 Amicizie, server privati tuoi o quelli dei tuoi amici
- 🔊 Accesso ai vocali delle stanze dei server

# ARCHITETTURA
- Il frontend comunica con il backend tramite REST e WebSocket
- Laravel si occupa dell'autenticazione, APIs ed eventi in real-time
- MySQL per la gestione del DB e delle queries inviate da Laravel
- Docker isola i servizi e gli ambienti

# COME FAR PARTIRE
```bash
git clone git@github:your-username/discordClone.git
cd discordClone
docker compose up --build
```
