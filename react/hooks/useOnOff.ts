import { useState } from 'react'

function useOnOff(initial: boolean): [boolean, () => void, () => void] {
  const [value, set] = useState(initial)

  const on = () => set(true)
  const off = () => set(false)
  return [value, on, off]
}

export default useOnOff