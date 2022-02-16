DROP DATABASE weather;
CREATE DATABASE weather;
USE weather;

CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(15) NOT NULL,
    userEmail VARCHAR(25) NOT NULL,
    userPassword TEXT NOT NULL
);

CREATE TABLE searchs(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cityName VARCHAR(200) NOT NULL,
    temperature VARCHAR(50) NOT NULL,
    feelslikeTemperature VARCHAR(50) NOT NULL,
    forecasts TEXT NOT NULL,
    humidity  VARCHAR(5) NOT NULL,
    windSpeed VARCHAR(50) NOT NULL,
    actualDay VARCHAR(50) NOT NULL,
    actualHour VARCHAR(50) NOT NULL,
    actualYear VARCHAR(5) NOT NULL,
    user INT NOT NULL,
    FOREIGN KEY(user) REFERENCES users(id)
);