import * as React from "react";
import * as ReactDOM from "react-dom";
import { Typography, Card } from "antd";
import { IPacket } from "../../../types";
import separateNumberFormat from "../../helpers/separateNumberFormat";
import { CurrencyRupiah } from "../CurrencyRupiah";

interface Props {
  packet?: IPacket;
  loading?: false;
}

const CardPacket: React.FC<Props> = ({ packet, loading }) => {
  const { Text } = Typography;
  return (
    <div className="bg-white rounded-md overflow-hidden shadow-md cursor-pointer hover:shadow-lg">
      <div className="w-auto h-40">
        <img
          alt={packet.name}
          src={packet.imageUrl}
          className="w-full h-full object-cover"
        />
      </div>
      <div className="px-4 py-2 flex flex-col">
        <Text strong>{packet.name}</Text>
        <Text>{packet.total}</Text>
        <CurrencyRupiah value={packet.price} className="text-orange-400" />
        <CurrencyRupiah discount value={packet.discounts} />
      </div>
    </div>
  );
};

export default CardPacket;

if (document.getElementById("card-packet")) {
  const propsContainer = document.getElementById("card-packet");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <CardPacket {...props} />,
    document.getElementById("card-packet")
  );
}
