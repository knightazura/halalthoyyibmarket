import * as React from "react";
import * as ReactDOM from "react-dom";
import { Row, Col, Typography } from "antd";
import { CrownOutlined, SendOutlined } from "@ant-design/icons";

interface Props {
  locationCustomer?: string;
}

const HeaderHomepage: React.FC<Props> = ({ locationCustomer = "Bandung indah permai" }) => {
  const { Text } = Typography;
  return (
    <Row className="px-4 py-2">
      <Col xs={10} sm={10} md={10} className="items-center">
        <CrownOutlined className="text-4xl" style={{color: "gold"}} />
      </Col>
      <Col xs={14} sm={14} md={14}>
        <div className="flex justify-between items-center">
          <div className="flex flex-col">
            <Text>Lokasi Anda</Text>
            <Text strong>{locationCustomer}</Text>
          </div>
          <SendOutlined className="text-2xl" style={{color: "blue"}}/>
        </div>
      </Col>
    </Row>
  );
};

export default HeaderHomepage;

if (document.getElementById("header-homepage")) {
  const propsContainer = document.getElementById("header-homepage");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <HeaderHomepage {...props} />,
    document.getElementById("header-homepage")
  );
}
