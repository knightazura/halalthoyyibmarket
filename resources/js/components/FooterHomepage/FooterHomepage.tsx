import * as React from "react";
import * as ReactDOM from "react-dom";
import { Row, Col, Typography, Badge } from "antd";
import { SearchOutlined, ShoppingCartOutlined, MessageOutlined } from "@ant-design/icons";

interface Props {
  
}

const FooterHomepage: React.FC<Props> = ({
}) => {
  const { Text } = Typography;
  return (
    <Row
      className="px-4 py-2 h-20 bg-white border border-gray-300 shadow"
      justify="space-around"
      align="middle"
    >
      <Col xs={6} sm={6} md={6}>
        <Row>
          <Col xs={24} sm={24} md={24}>
            <Row justify="center">
              <Badge count={5}>
                <ShoppingCartOutlined className="text-2xl" />
              </Badge>
            </Row>
          </Col>
          <Col xs={24} sm={24} md={24}>
          <Row justify="center">
            <Text>Keranjang</Text>
            </Row>
          </Col>
        </Row>
      </Col>
      <Col xs={6} sm={6} md={6}>
        <Row>
          <Col xs={24} sm={24} md={24}>
            <Row justify="center">
              <Badge count={5}>
                <SearchOutlined className="text-2xl" />
              </Badge>
            </Row>
          </Col>
          <Col xs={24} sm={24} md={24}>
          <Row justify="center">
            <Text>Search</Text>
            </Row>
          </Col>
        </Row>
      </Col>
      <Col xs={6} sm={6} md={6}>
        <Row>
          <Col xs={24} sm={24} md={24}>
            <Row justify="center">
              <Badge count={5}>
                <MessageOutlined className="text-2xl" />
              </Badge>
            </Row>
          </Col>
          <Col xs={24} sm={24} md={24}>
          <Row justify="center">
            <Text>Notifikasi</Text>
            </Row>
          </Col>
        </Row>
      </Col>
      <Col xs={6} sm={6} md={6}>
        <Row>
          <Col xs={24} sm={24} md={24}>
            <Row justify="center">
              <Badge count={5}>
                <ShoppingCartOutlined className="text-2xl" />
              </Badge>
            </Row>
          </Col>
          <Col xs={24} sm={24} md={24}>
          <Row justify="center">
            <Text>Keranjang</Text>
            </Row>
          </Col>
        </Row>
      </Col>
    </Row>
  );
};

export default FooterHomepage;

if (document.getElementById("footer-homepage")) {
  const propsContainer = document.getElementById("footer-homepage");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <FooterHomepage {...props} />,
    document.getElementById("footer-homepage")
  );
}
