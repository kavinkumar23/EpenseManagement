
import React, { useEffect, useState } from "react";
import Form from 'react-bootstrap/Form'
import Button from 'react-bootstrap/Button';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import { useNavigate, useParams } from 'react-router-dom'
import axios from 'axios';


export default function EditExpense() {
    const navigate = useNavigate();

    const { id } = useParams()

    const [expense, setexpense] = useState("")
    const [description, setDescription] = useState("")

    const updateExpense = async (e) => {
        e.preventDefault();

        var someElement = document.getElementById("fname").value;
        var eeprice = document.getElementById("eprice").value;
        var descriptionh = document.getElementById("subject").value;


        await axios.post(`/expenseUpdate.php`, { name: someElement, price: eeprice, description: descriptionh, expenseid: id }).then(({ data }) => {
            navigate("/")
        }).catch(({ response }) => {
            
        })
    }

    return (
        
            
                        <div className="card-body">
                            <h4 className="card-title">Update expense</h4>
                            <div className="form-wrapper">
                                <Form onSubmit={updateExpense}>
                                    <Row>
                                        <Col>
                                            <Form.Group controlId="name">
                                                <Form.Label>name</Form.Label>
                                                <Form.Control  type="text" value={name} onChange={(event) => {
                                                    setexpense(event.target.value)
                                                }} />
                                            </Form.Group>
                                        </Col>
                                    </Row>
                                    <Row className="my-3">
                                        <Col>
                                            <Form.Group controlId="description">
                                                <Form.Label>Description</Form.Label>
                                                <Form.Control as="textarea" rows={3} value={description} onChange={(event) => {
                                                    setDescription(event.target.value)
                                                }} />
                                            </Form.Group>
                                        </Col>
                                    </Row>
                                    <Row>
                                        <Col>
                                            <Form.Group controlId="price" className="mb-3">
                                                <Form.Label>Price</Form.Label>
                                                <Form.Control type="text" onChange={changeHandler} />
                                            </Form.Group>
                                        </Col>
                                    </Row>
                                    <Button variant="primary" className="mt-2" size="lg" block="block" type="submit">
                                        Update
                                    </Button>
                                </Form>
                            </div>
                        </div>
                  
           
       
}