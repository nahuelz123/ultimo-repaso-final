create database StoreBdd if not exists;

use StoreBdd;

create table if not exists User (
    name varchar(30) not null,
    lastName varchar(30) not null,
    email varchar(30) not null,
    password varchar(30) not null,
    idUser integer not null auto_increment,
    primary key (idUser);
);

create table if not exists Producto (
    name varchar(30) not null,
    price float not null,
    stock integer not null,
    detail varchar(30) not null,
    state varchar(30) not null,
    status integet not null,
    idProducto integer not null auto_increment,
    idUser integer not null,
    primary key (idProducto),
    foreign key (idUser) references User (idUser);
);

DELIMITER //

create procedure User_GetByEmail(in emailS varchar(30))
begin 
    select *
    from User
    where User.email = emailS;
end//

DELIMITER // 

create procedure User_Add (in nameS varchar(30), in lastNameS varchar(30), in emailS varchar(30), in passwordS varchar(30))
begin
    insert into User (User.name, User.lastName, User.email, User,password)
    values (nameS, lastNameS, emailS, passwordS);
end//

DELIMITER//

create procedure Producto_GetAllStock()
begin 
    select *
    from Producto
    where Producto.stock > 0 and Producto.status = 1;
end//

DELIMITER//

create procedure Producto_Add (in nameS varchar (30), in priceS float, in stockS integer, in detailS varchar(30), in stateS varchar(30),in statusS integer, in idSellerS integer)
begin
    insert into Producto (Producto.name,Producto.price,Producto.stock,Producto.detail,Producto.state,Producto.status,Producto.idSeller)
    values (nameS, priceS, stockS,detailS, stateS,statusS, idSellerS);
end//

DELIMETER//
create procedure Producto_ReduceStockById (in idProdS integer)
begin 
    update Producto set Producto.stock = Producto.stock - 1 where Producto.idProducto = idProdS;
end//

create procedure Producto_GetProductoById(in idProd integer)
begin 
    select *
    from Producto
    where Producto.idProducto = idProd;
end//

DELIMETER//
create procedure Producto_DeleteById (in idProd integer)
begin 
    update Producto set Producto.status = 0 where Producto.idProducto = idProdS;
end//


