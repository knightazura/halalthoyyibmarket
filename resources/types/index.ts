export interface IProduct {
  id: string;
  name: string;
}

export interface IPacket {
  id: string;
  name: string;
  imageUrl: string;
  total: number;
  price: number;
  discounts: number;
  products?: Array<IProduct>
}
