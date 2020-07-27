import * as React from "react";
interface Informations {
    id: string;
    name: string;
    url?: string;
}
interface Props {
    informations?: Array<Informations>;
    backgroundImageUrl?: string;
}
declare const CardInformation: React.FC<Props>;
export default CardInformation;
