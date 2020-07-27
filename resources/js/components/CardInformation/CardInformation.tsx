import * as React from "react";
import * as ReactDOM from "react-dom";
import { Typography, Button } from "antd";

interface Informations {
  id: string;
  name: string;
  url?: string;
}

interface Props {
  informations?: Array<Informations>;
  backgroundImageUrl?: string;
}

const dummy: Array<Informations> = [
  {
    id: "01",
    name: "ARTIKEL",
  },
  {
    id: "02",
    name: "BERITA",
  },
  {
    id: "03",
    name: "PENGUMUMAN",
  },
];

const CardInformation: React.FC<Props> = ({
  informations = dummy,
  backgroundImageUrl = "https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/v755-toon-22_1.jpg?bg=transparent&con=3&cs=srgb&dpr=1&fm=jpg&ixlib=php-3.1.0&q=80&usm=15&vib=3&w=1300&s=beda42e7ae24c3b3c5c5d70547eec3a8",
}) => {
  const { Text } = Typography;
  return (
    <div
      className="h-20 flex justify-center items-center bg-local"
      style={{ backgroundImage: `url(${backgroundImageUrl})` }}
    >
      {informations.map((information, index) => (
        <span>
          <Button type="text" key={information.id}>
            <span className="text-white font-weight-bolder">
              {information.name}
            </span>
          </Button>
          {index < informations.length - 1 ? (
            <span className="text-white font-weight-bolder">/</span>
          ) : null}
        </span>
      ))}
    </div>
  );
};

export default CardInformation;

if (document.getElementById("card-information")) {
  const propsContainer = document.getElementById("card-information");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <CardInformation {...props} />,
    document.getElementById("card-information")
  );
}
