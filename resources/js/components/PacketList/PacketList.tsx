import * as React from "react";
import * as ReactDOM from "react-dom";
import { IPacket } from "../../../types";
import { Row, Col } from "antd";
import { CardPacket } from "../CardPacket";

interface Props {
  packets?: Array<IPacket>;
}

const dummy: Array<IPacket> = [
  {
    id: "01",
    imageUrl:
      "https://i.pinimg.com/originals/30/32/55/303255c5d6a3932f74f4a9f7ab093991.png",
    name: "Beras",
    discounts: 110000,
    price: 100000,
    total: 82,
  },
  {
    id: "02",
    imageUrl:
      "https://d324bm9stwnv8c.cloudfront.net/artikel/20180912072418.689-1909513443.png",
    name: "Beras super",
    discounts: 102000,
    price: 110000,
    total: 50,
  },
  {
    id: "03",
    imageUrl:
      "https://i.pinimg.com/originals/30/32/55/303255c5d6a3932f74f4a9f7ab093991.png",
    name: "Beras",
    discounts: 310000,
    price: 290000,
    total: 82,
  },
  {
    id: "04",
    imageUrl:
      "https://d324bm9stwnv8c.cloudfront.net/artikel/20180912072418.689-1909513443.png",
    name: "Beras super",
    discounts: 212000,
    price: 210000,
    total: 50,
  },
];

const PacketList: React.FC<Props> = ({ packets = dummy }) => {
  return (
    <Row gutter={16}>
      {packets.map((packet) => (
        <Col xs={12} sm={12} md={12} key={packet.id} className="mb-4">
          <CardPacket packet={packet} />
        </Col>
      ))}
    </Row>
  );
};

export default PacketList;

if (document.getElementById("packet-list")) {
  const propsContainer = document.getElementById("packet-list");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <PacketList {...props} />,
    document.getElementById("packet-list")
  );
}
