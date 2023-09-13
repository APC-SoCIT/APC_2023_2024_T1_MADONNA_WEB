from django import template

register = template.Library()

@register.filter(name='is_member_of_group')
def is_member_of_group(user, group_name):
    return user.groups.filter(name=group_name).exists()
    