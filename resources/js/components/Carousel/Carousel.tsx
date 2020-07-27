import * as React from "react";
import * as ReactDOM from "react-dom";
import { Carousel } from "antd";

interface Slider {
  id: string;
  name?: string;
  imageUrl: string;
  url?: string;
}

interface Props {
  sliders?: Array<Slider>;
}

const dummy:Array<Slider> = [
    {
        id: "01",
        imageUrl: "https://i.pinimg.com/originals/30/32/55/303255c5d6a3932f74f4a9f7ab093991.png",
        name: "beras",
    },
    {
        id: "02",
        imageUrl: "https://d324bm9stwnv8c.cloudfront.net/artikel/20180912072418.689-1909513443.png",
        name: "beras",
    },
]

const CarouselCustom: React.FC<Props> = ({ sliders=dummy }) => {
  return (
    <Carousel autoplay>
      {sliders.map((slider) => (
        <div key={slider.id}>
          <img src={slider.imageUrl} alt={slider.name} className="object-fill"/>
        </div>
      ))}
    </Carousel>
  );
};

export default CarouselCustom;

if (document.getElementById("carousel")) {
  const propsContainer = document.getElementById("carousel");
  const props = Object.assign({}, propsContainer.dataset);

  ReactDOM.render(
    <CarouselCustom {...props} />,
    document.getElementById("carousel")
  );
}
