import './bootstrap';

/**
 * グローバル関数として登録
 */
window.onClickCopy = function (elementName) {
  const element  = document.getElementById(elementName);
  const value = element.value;

  if (!navigator.clipboard) {
    element.select();
    document.execCommand('copy');
  } else {
    navigator.clipboard.writeText(value).then(
      () => {
        alert("Copied.");
      },
      () => {
        alert("Can't Copy.");
      }
    );
  }
}
