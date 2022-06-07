import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import Button from 'react-bootstrap/Button'
import axios from 'axios';


export default function ViewExpense() {

    const [expense, setexpense] = useState([])

    useEffect(() => {
        fetchexpense()
    }, [])

    const fetchexpense = async () => {
        await axios.get(`/expenseAll.php`).then(({ data }) => {
            setexpense(data)
        })
    }

    const deleteexpense = async (id) => {
        await axios.get(`/expenseDelete.php`, { expenseid: id }).then({ data }) => {
            alert(this.state.value + 'Deleted');
        });
    }

    return (
        <div className="container">
            <div className="row">
                <div className="col-12">
                    <div className="card card-body">
                        <div className="table-responsive">
                            <table className="table table-bordered mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        expense.length > 0 && (
                                            expense.map((row, key) => (
                                                <tr key={key}>
                                                    <td>{row.name}</td>
                                                    <td>{row.price}</td>
                                                    <td>{row.description}</td>
                                         
                                                    <td>
                                                        <Link to={`/expense/edit/${row.id}/${row.name}/${row.price}/${row.description}`} className='btn btn-success me-2'>
                                                            Edit
                                                    </Link>
                                                        <Button variant="danger" onClick={() => deleteexpense(row.id)}>
                                                            Delete
                                                    </Button>
                                                    </td>
                                                </tr>
                                            ))
                                        )
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}