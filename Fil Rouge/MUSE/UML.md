```mermaid
classDiagram

class Cart{
PK - id
clientOrderId
validated
orderDetails
user
orderDate
shipped
shipmentDate
carrier
carrierShipmentId
total
billingAddress
deliveryAddress
additionalDiscountRate
}

Cart -- OrderDetails
class Category{
PK - id
name
products
parentCategory
}

Category -- Product
Category -- self
class Address{
PK - id
name
country
zipcode
city
pathType
pathNumber
user
billingAddress
deliveryAddress
}

class Contact{
PK - id
name
email
message
user
subject
enquiryDate
}

class OrderDetails{
PK - id
productId
quantity
cart
product
subTotal
}

class Product{
PK - id
name
price
description
content
image
discount
categories
quantity
image1
image2
discountRate
supplier
}

Product -- Category
class User{
PK - id
email
roles
password
userName
userLastname
birthdate
phoneNumber
isVerified
carts
registerDate
vat
pro
proCompanyName
proDuns
proJobPosition
address
}

User -- Cart
User -- Address
class ResetPasswordRequest{
PK - id
user
}

ResetPasswordRequest -- User
class Supplier{
PK - id
name
}


```