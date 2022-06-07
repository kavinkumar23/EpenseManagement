import React, { Component } from 'react';
import axios from 'axios';
import { Router, Route, Link } from 'react-router';
import { useNavigate } from 'react-router-dom'


class Master extends Component {
   
    constructor(props) {
    super(props);
        this.state = { value: 'Dummy' };
        
    this.handleSubmit = this.handleSubmit.bind(this);
        this.handleSubmit1 = this.handleSubmit1.bind(this);
        const { navigate } = useNavigate();
    }
    
    
    handleSubmit1(event) {
        alert(this.state.value + 'Expense tracker');
        navigate('Viewexpense');
    }
    handleSubmit(event) {
        var someElement = document.getElementById("fname").value;
        var eeprice = document.getElementById("eprice").value;
        var descriptionh = document.getElementById("subject").value;

        if (someElement == "") {
            alert('name is empty');
            event.target.reset();
            navigate('/');
        }
        if (isNaN(eeprice)){
            alert('price is not number');
            event.target.reset();
            navigate('/');
        }
        
        axios.post(`/expenseCreate.php`, { name: someElement, price: eeprice, description: descriptionh })
            .then(res => {
                //console.log(res);
                console.log(res.data);
                alert(this.state.value + ' Expense Submitted Wahhooo!!!');
                event.target.reset();
            })

        event.preventDefault();
    }
    render() {
        return (     
            <div>
                <p>Expense Form</p>
                    <form onSubmit={this.handleSubmit}>
                        <label>Name</label>
                        <input type="text" id="fname" name="name" placeholder="Your name.." />
                        <label>Price</label>
                        <input type="text" id="eprice" name="price" placeholder="Price"/>

                        <label>Description</label>
                        <textarea id="subject" name="description" placeholder="Write something.."></textarea>
                        <input type="submit" value="Submit" />
                    </form>
                <form onSubmit={this.handleSubmit1}>
                    <input type="submit" value="ExpenseTracker" />
                </form>
             </div>
            
        )
    }
}
export default Master;
