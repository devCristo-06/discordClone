# Usa Node LTS base
FROM node:22-slim AS build

# Imposta directory di lavoro
WORKDIR /usr/src/app

# Copia i file di dipendenze per caching
COPY package*.json ./

# Installa solo le dipendenze necessarie (senza dev se non serve)
RUN npm ci --no-audit --no-fund

# Copia tutto il codice sorgente
COPY . .

# Disattiva analytics Angular
RUN npx ng analytics off --global

# Costruisci il progetto in modalità produzione
RUN npm run build --omit=dev

# --- STAGE DI SERVE ---
FROM nginx:stable-alpine AS serve

# Copia la build Angular corretta nel server NGINX
COPY --from=build /usr/src/app/dist/frontend/browser /usr/share/nginx/html


# Espone la porta
EXPOSE 4200

# Avvia NGINX
CMD ["nginx", "-g", "daemon off;"]
