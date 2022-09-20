export function getBreakpoint() {
  const w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  return (w < 768) ? 'xs' : ((w < 992) ? 'sm' : ((w < 1200) ? 'md' : 'lg'));
}