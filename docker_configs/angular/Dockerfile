FROM node:alpine as build

WORKDIR /app

COPY ./package*.json ./
RUN npm install

COPY . .

RUN npm run build --output-path=./dist/frontend --configuration production