import * as React from "react";
import * as ReactDOM from "react-dom";
import { Button } from "antd";

export default Button;

if (document.getElementById("button")) {
  const propsContainer = document.getElementById("button");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <Button {...props}>{props.label}</Button>,
    document.getElementById("button")
  );
}
