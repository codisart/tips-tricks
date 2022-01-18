import { useState } from 'react'

function useToogle(initial: boolean): [boolean, (_value: boolean) => void] {
  const [value, set] = useState(initial)

  const toggle = (_value: boolean) => set(!_value)
  return [value, toggle]
}

export default useToogle