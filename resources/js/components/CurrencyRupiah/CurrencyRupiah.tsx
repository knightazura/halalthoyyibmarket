import * as React from "react";
import * as ReactDOM from "react-dom";
import { Typography } from "antd";
import separateNumberFormat from "../../helpers/separateNumberFormat";

interface Props {
  value?: number;
  className?: string;
  discount?: boolean;
}

const CurrencyRupiah: React.FC<Props> = ({ value = 0, className, discount=false }) => {
  const { Text } = Typography;
  return (
    <Text delete={discount} className={className}>{`Rp ${separateNumberFormat(value)}`}</Text>
  );
};

export default CurrencyRupiah;

if (document.getElementById("currency-rupiah")) {
  const propsContainer = document.getElementById("currency-rupiah");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <CurrencyRupiah {...props} />,
    document.getElementById("currency-rupiah")
  );
}
