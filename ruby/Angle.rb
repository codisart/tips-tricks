# frozen_string_literal: true

class Angle
  private_class_method :new
  DEGREES_360 = 360

  def initialize value
    @value = value % 360
  end

  def self.degrees(value)
    new value
  end

  def self.radians(value)
    new (value * 180) / Math::PI
  end

  def in_degrees
    @value
  end

  def in_radians
    (@value * Math::PI) / 180
  end

  def self.sin angle
    Math::sin(angle.in_radians)
  end

  def self.cos angle
    Math::cos(angle.in_radians)
  end

  def *(other)
    Angle.degrees(@value * other)
  end

  def **(other)
    Angle.degrees(@value**other)
  end

  def /(other)
    Angle.degrees(@value / other)
  end

  def -(other)
    Angle.degrees(@value - cast_angle(other).in_degrees)
  end

  def +(other)
    Angle.degrees(@value + cast_angle(other).in_degrees)
  end

  def coerce(other)
    [AngleCoercion.new(self), other]
  end

  def cast_angle(other)
    return other if other.is_a? Angle
    Angle.degrees(other)
  end
end

class AngleCoercion
  # @param [Angle] angle
  def initialize(angle)
    @angle = angle
  end

  def *(other)
    @angle * other
  end

  def -(other)
    Angle.degrees(other) - @angle
  end

  def +(other)
    Angle.degrees(other) + @angle
  end
end

