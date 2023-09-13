from functools import wraps
from django.shortcuts import redirect
from django.core.exceptions import PermissionDenied



def groups_required(group_names):
    def decorator(view_func):
        @wraps(view_func)
        def _wrapped_view(request, *args, **kwargs):
            user_groups = set(request.user.groups.values_list('name', flat=True))
            allowed_groups = set(group_names)
            
            if user_groups.intersection(allowed_groups):
                return view_func(request, *args, **kwargs)
            else:
                raise PermissionDenied 
        return _wrapped_view
    return decorator