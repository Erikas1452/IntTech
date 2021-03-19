import React, { Component } from "react";
import ReactDOM from 'react-dom';

class LoginForm extends Component {

  state={
    loginEmail:'',
    loginPassword:''
  }

  handleChange = (e) =>{
    const name = e.target.name;
    const value =  e.target.value;
    this.setState({[name]:value})
    console.log(name);
    console.log(value);
  }

  handleSubmit = (e) =>{
    
  }

  render() {
    return (
    <form>
      <div className="container">
        <h1>Login</h1>
        <p>Please fill in this form to login.</p>
        <hr/>
        <div className="login-box">
          <label hmtlfor="loginEmail"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="loginEmail" id="loginEmail" required onChange={this.handleChange}/>
          <label hmtlfor="loginPassword"><b>Password</b></label>
          <input type="password" placeholder="Enter Pasword" name="loginPassword" id="loginPassword" required onChange={this.handleChange}/> 
        </div>
        <hr/>
        <div className="login-button-container">
          <button type="submit" onSubmit={this.handleSubmit}>Login</button>
        </div>
        
      </div>
    </form>
    );
  }
}

export default LoginForm;
if (document.getElementById('loginform')) {
    ReactDOM.render(<LoginForm />, document.getElementById('loginform'));
}
