require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import { Router, Route } from 'react-router';
import { createBrowserHistory } from 'history';
import { useNavigate } from 'react-router-dom'

import Master from './components/Master';
import CreateItem from './components/CreateItem';


import Example from './components/Example';

import ListExpense from './components/ListExpense';



render(<Master />, document.getElementById('example'));

//render(
    
//        <Router path="/Master" component={Master} >
//            <Route path="/add-item" component={CreateItem} />
//           <Route path="/expense/edit/:id" element={<ListExpense />} />
//        </Router>,
//    document.getElementById('example'));
