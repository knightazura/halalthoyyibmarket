import * as React from "react";
interface Slider {
    id: string;
    name?: string;
    imageUrl: string;
    url?: string;
}
interface Props {
    sliders?: Array<Slider>;
}
declare const CarouselCustom: React.FC<Props>;
export default CarouselCustom;
