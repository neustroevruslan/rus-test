CREATE TABLE IF NOT EXISTS cars (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(45),
    year INT(45),
    color VARCHAR(45),
    PRIMARY KEY(id)
);

INSERT INTO cars (name, year, color) 
VALUES 
    ('Toyota', '2005', 'red'),
    ('Ford', '2011', 'yellow'),
    ('Alfa Romeo', '1993', 'black'),
    ('BMW', '2015', 'purple'),
    ('Honda', '1999', 'blue'),
    ('Ferrari', '1986', 'azure'),
    ('Chevrolet', '2009', 'aquamarine'),
    ('Audi', '2011', 'bronze'),
    ('Bugatti', '2019', 'gold'),
    ('Bentley', '2001', 'chocolate');