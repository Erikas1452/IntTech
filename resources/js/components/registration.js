import React, { Component } from "react";
import ReactDOM from 'react-dom';

class UsingFetch extends Component {
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
      <div>
        <h3>Using GET in React for API call</h3>
      </div>
    );
  }
}

export default UsingFetch;
if (document.getElementById('axiostest')) {
    ReactDOM.render(<UsingFetch />, document.getElementById('axiostest'));
}
