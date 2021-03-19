import React, { Component } from "react";
import ReactDOM from 'react-dom';

class LoginForm extends Component {

  constructor(props)
  {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

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

    e.preventDefault();

    const {loginEmail,loginPassword}=this.state;
    
    const recipeUrl = 'http://91.211.247.110/api/user/create';
    const postBody = {
        email: loginEmail,
        password: loginPassword
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

  render() {
    return (
    <form type="submit" onSubmit={this.handleSubmit}>
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
          <button>Login</button>
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
