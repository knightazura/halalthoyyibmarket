export default function separateNumberFormat(num: number) {
  return num.toString()
    .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
