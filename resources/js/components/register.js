import React, { Component } from "react";
import ReactDOM from 'react-dom';

class Registration extends Component {
  constructor(props) {
    super(props);
    //this.getUsers = this.getUsers.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

 // componentDidMount() {
   // this.getUsers();
  //}

  state={
    email:'',
    psw:'',
    pswRepeat:''
  }

  handleChange = (e) =>{
    const name = e.target.name;
    const value =  e.target.value;
    this.setState({[name]:value})
  }

  handleSubmit = (e) =>{
    e.preventDefault();
    const {email,psw,pswRepeat}=this.state;
    //check if passwords match before sending data?
    const recipeUrl = '/api/user/create';
    const postBody = {
        email: email,
        psw: psw,
        pswRepeat: pswRepeat
    };
    const requestMetadata = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postBody)
    };

    fetch(recipeUrl, requestMetadata)
        .then(res => res.json())
        .then(recipes => {
            console.log(recipes);
            // this.setState({ recipes });
        });
  }

  //async getUsers() {}


  render() {
    return (
    <form type="submit" onSubmit={this.handleSubmit}>
      <div className="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr/>

        <div className="register-box">
            <label hmtlfor="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required onChange={this.handleChange}/>

            <label hmtlfor="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required onChange={this.handleChange}/>

            <label hmtlfor="pswRepeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="pswRepeat" id="pswRepeat" required onChange={this.handleChange}/>
        </div>

        <hr/>
        <div className="register-button-container">
            <button className="registerbtn">Register</button>
        </div>

      </div>
    </form>
    );
  }
}

export default Registration;
if (document.getElementById('registration-form')) {
    ReactDOM.render(<Registration />, document.getElementById('registration-form'));
}
