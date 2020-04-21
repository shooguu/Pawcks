var quantity = /^(\d{1}|\d{2})$/
var phoneNumber = /^[2-9]\d{2}-\d{3}-\d{4}$/;
var zipcode = /^\d{5}(?:[-\s]\d{4})?$/;
var creditcard = /^(\d{12})$/;
var firstName = /([a-zA-Z]{3,30}\s*)+/;
var lastName = /[a-zA-Z]{3,30}/

function test()
{
    if (!quantity.test(document.getElementsByName('quantity')[0].value)) 
    {
        alert('Enter valid quantity (Max 99)');
    }
    else if (!phoneNumber.test(document.getElementsByName('phonenumber')[0].value)) 
    {
        alert('Enter valid Phone Number (xxx-xxx-xxxx)');
    }
    else if (!zipcode.test(document.getElementsByName('zip')[0].value))
    {
        alert("Enter 5 digit zipcode number");
    }
    else if (!creditcard.test(document.getElementsByName('ccnumber')[0].value))
    {
        alert("Enter valid Credit Card number (12 Digits)");
    }
    else if (!firstName.test(document.getElementsByName('firstname')[0].value))
    {
        alert("Enter valid First Name");
    }
    else if (!firstName.test(document.getElementsByName('lastname')[0].value))
    {
        alert("Enter valid Last Name");
    }
}