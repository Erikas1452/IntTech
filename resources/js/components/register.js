import React, { Component } from "react";
import ReactDOM from 'react-dom';

class Registration extends Component {
  constructor() {
    super();
    this.getUsers = this.getUsers.bind(this);
  }

  componentDidMount() {
    this.getUsers();
  }

  async getUsers() {

    fetch("https://cat-fact.herokuapp.com/facts", {
      method: "GET",
    })
      .then(response => {
        let json = response.json();
        console.log(json);
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
      })
      .catch(error => {
        console.error(
          "There has been a problem with your fetch operation:",
          error
        );
      });
  }

  render() {
    return (
      <form>
      <div className="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr/>

        <div className="register-box">
            <label hmtlfor="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required/>
        
            <label hmtlfor="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required/>
        
            <label hmtlfor="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required/>
        </div>

        <hr/>
        <div className="register-button-container">
            <button type="submit" className="registerbtn">Register</button>
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
